(function(){
  var reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  document.documentElement.classList.add('js');
  /* nav state + hero zoom + footer drift */
  var nav = document.getElementById('nav'), hero = document.getElementById('hero'), giant = document.getElementById('giant');
  function onScroll(){
    var y = window.scrollY;
    nav.classList.toggle('scrolled', y > (hero ? hero.offsetHeight - 60 : 40));
    if (!reduce && hero){ var p = Math.min(y / (hero.offsetHeight || 1), 1); hero.style.setProperty('--hs', (1.08 - p*0.08).toFixed(3)); }
    if (!reduce && giant){ var r = giant.getBoundingClientRect(); var t = Math.max(0, Math.min(1, (window.innerHeight - r.top) / (r.height + 200))); giant.style.setProperty('--gy', (40 - t*40).toFixed(1) + 'px'); }
  }
  window.addEventListener('scroll', onScroll, {passive:true}); onScroll();
  /* reveal: only lift items that start below the fold */
  var rvs = [].slice.call(document.querySelectorAll('.rv'));
  if ('IntersectionObserver' in window && !reduce){
    rvs.forEach(function(el){ if (el.getBoundingClientRect().top > window.innerHeight) el.classList.add('pre'); });
    var io = new IntersectionObserver(function(es){ es.forEach(function(e){ if (e.isIntersecting){ e.target.classList.remove('pre'); io.unobserve(e.target); } }); }, {rootMargin:'0px 0px -8% 0px'});
    rvs.forEach(function(el){ if (el.classList.contains('pre')) io.observe(el); });
  }

  /* stat count-up when stats scroll in */
  var stats = document.querySelector('.stats');
  if (stats && 'IntersectionObserver' in window && !reduce && stats.getBoundingClientRect().top > window.innerHeight){
    var so = new IntersectionObserver(function(es){
      if (!es[0].isIntersecting) return; so.disconnect();
      stats.querySelectorAll('[data-count]').forEach(function(b){
        var end = +b.dataset.count, suf = b.dataset.suffix || '', t0 = performance.now();
        (function tick(t){ var k = Math.min((t - t0)/1400, 1), v = Math.round(end * (1 - Math.pow(1-k, 3))); b.textContent = v + suf; if (k < 1) requestAnimationFrame(tick); })(t0);
      });
    }, {threshold:.4});
    so.observe(stats);
  }
})();

/* Floating header menu button (phones/tablets): opens the link panel. */
(function(){
  var btn = document.getElementById('nav-burger'), panel = document.getElementById('nav-panel'), nav = document.getElementById('nav');
  if (!btn || !panel || !nav) return;
  var here = location.pathname.replace(/\/+$/, '') || '/';
  panel.querySelectorAll('.np-main a').forEach(function(a){
    var p = new URL(a.href).pathname.replace(/\/+$/, '') || '/';
    if (p === here || (p !== '/' && here.indexOf(p + '/') === 0)) a.setAttribute('aria-current', 'page');
  });
  function set(open){
    panel.hidden = !open; nav.classList.toggle('menu-open', open);
    btn.setAttribute('aria-expanded', open ? 'true' : 'false');
    btn.setAttribute('aria-label', open ? 'Close menu' : 'Open menu');
    if (open) { var f = panel.querySelector('a'); if (f) f.focus({preventScroll:true}); }
  }
  btn.addEventListener('click', function(){ set(panel.hidden); });
  document.addEventListener('keydown', function(e){ if (e.key === 'Escape' && !panel.hidden){ set(false); btn.focus(); } });
  document.addEventListener('click', function(e){ if (!panel.hidden && !panel.contains(e.target) && !btn.contains(e.target)) set(false); });
  panel.addEventListener('click', function(e){ if (e.target.closest('a')) set(false); });
  window.addEventListener('resize', function(){ if (window.innerWidth > 900 && !panel.hidden) set(false); });
  /* Keep the bar visible while the menu is open, even if the page scrolls back over the hero. */
  new MutationObserver(function(){ if (!panel.hidden && !nav.classList.contains('scrolled') && !document.body.classList.contains('sck-interior')) set(false); }).observe(nav, {attributes:true, attributeFilter:['class']});
})();
