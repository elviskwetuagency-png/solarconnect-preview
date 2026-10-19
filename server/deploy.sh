#!/bin/bash
# Solar Connect preview: auto-deploy from GitHub.
# Runs from cron every few minutes. Downloads the latest "main" branch only
# when it has changed, then copies the site files into the subdomain folder.
#
# Edit these four values once:
REPO="OWNER/REPO"                      # e.g. elvis/solarconnect-preview
TOKEN=""                               # fine-grained GitHub token (read-only, this repo). Leave empty if the repo is public.
TARGET="$HOME/domains/elvisdigital.co.ke/public_html/solarconnect"   # the subdomain's folder
STATE="$HOME/.solarconnect-deploy"    # where the script remembers the last deployed version

set -euo pipefail
mkdir -p "$STATE"
AUTH=()
[ -n "$TOKEN" ] && AUTH=(-H "Authorization: Bearer $TOKEN")

SHA=$(curl -fsSL ${AUTH[@]+"${AUTH[@]}"} -H "Accept: application/vnd.github+json" \
  "https://api.github.com/repos/$REPO/commits/main" | grep -m1 '"sha"' | cut -d'"' -f4)
[ -z "$SHA" ] && { echo "Could not read latest commit"; exit 1; }
[ -f "$STATE/sha" ] && [ "$(cat "$STATE/sha")" = "$SHA" ] && exit 0

TMP=$(mktemp -d)
trap 'rm -rf "$TMP"' EXIT
curl -fsSL ${AUTH[@]+"${AUTH[@]}"} -o "$TMP/site.zip" "https://api.github.com/repos/$REPO/zipball/main"
unzip -q "$TMP/site.zip" -d "$TMP/x"
SRC=$(find "$TMP/x" -mindepth 1 -maxdepth 1 -type d | head -1)

mkdir -p "$TARGET"
cp -f "$SRC/index.html" "$SRC/.htaccess" "$TARGET/"
mkdir -p "$TARGET/assets"
cp -rf "$SRC/assets/." "$TARGET/assets/"

echo "$SHA" > "$STATE/sha"
echo "$(date '+%F %T') deployed $SHA" >> "$STATE/log"
