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
