(function(){
  var reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  /* mobile menu */
  var mt = document.getElementById('menu-toggle'), mm = document.getElementById('mmenu');
  if (mt && mm){
    mt.addEventListener('click', function(){ var open = mm.hidden; mm.hidden = !open; mt.setAttribute('aria-expanded', open); mt.setAttribute('aria-label', open ? 'Close menu' : 'Open menu'); });
    mm.querySelectorAll('a').forEach(function(a){ a.addEventListener('click', function(){ mm.hidden = true; mt.setAttribute('aria-expanded', 'false'); mt.setAttribute('aria-label', 'Open menu'); }); });
  }

  /* project rail: drag, arrows, counter */
  var rail = document.getElementById('rail'), cards = [].slice.call(rail.querySelectorAll('.ocard'));
  var pjN = document.getElementById('pj-n'), pjCap = document.getElementById('pj-cap'), curIdx = 0;
  var down = false, sx = 0, sl = 0;
  rail.addEventListener('pointerdown', function(e){ if (e.pointerType !== 'mouse') return; down = true; sx = e.clientX; sl = rail.scrollLeft; });
  window.addEventListener('pointermove', function(e){ if (!down) return; var dx = e.clientX - sx; if (Math.abs(dx) > 4) rail.classList.add('dragging'); rail.scrollLeft = sl - dx; });
  window.addEventListener('pointerup', function(){ down = false; rail.classList.remove('dragging'); });
  function goCard(i){ i = Math.max(0, Math.min(cards.length - 1, i)); rail.scrollTo({left: cards[i].offsetLeft - cards[0].offsetLeft, behavior: reduce ? 'auto' : 'smooth'}); }
  function setIdx(i){ if (i === curIdx) return; curIdx = i; pjN.textContent = (i + 1 < 10 ? '0' : '') + (i + 1); pjCap.textContent = cards[i].dataset.cap; }
  document.getElementById('prev').addEventListener('click', function(){ goCard(curIdx - 1); });
  document.getElementById('next').addEventListener('click', function(){ goCard(curIdx + 1 >= cards.length ? 0 : curIdx + 1); });
  var auto = null, inView = false, hold = false;
  function startAuto(){ clearInterval(auto); if (reduce || !inView || hold) return; auto = setInterval(function(){ goCard(curIdx + 1 >= cards.length ? 0 : curIdx + 1); }, 4500); }
  function pause(){ hold = true; clearInterval(auto); }
  function resume(){ hold = false; startAuto(); }
  rail.addEventListener('mouseenter', pause); rail.addEventListener('mouseleave', resume);
  rail.addEventListener('touchstart', pause, {passive:true}); rail.addEventListener('touchend', function(){ setTimeout(resume, 2500); });
  ['prev','next'].forEach(function(id){ document.getElementById(id).addEventListener('click', function(){ if (!hold) startAuto(); }); });
  if ('IntersectionObserver' in window){ new IntersectionObserver(function(es){ inView = es[0].isIntersecting; if (inView) startAuto(); else clearInterval(auto); }, {threshold:.3}).observe(rail); } else { inView = true; startAuto(); }
  rail.addEventListener('scroll', function(){
    var max = rail.scrollWidth - rail.clientWidth, x = rail.scrollLeft, best = 0, bd = 1e9;
    if (max > 0 && x >= max - 4){ best = cards.length - 1; } else cards.forEach(function(c, j){ var d = Math.abs(c.offsetLeft - cards[0].offsetLeft - x); if (d < bd){ bd = d; best = j; } });
    setIdx(best);
  }, {passive:true});

  /* accordion synced to the layer stack */
  var items = [].slice.call(document.querySelectorAll('.acc-item')),
      shots = [].slice.call(document.querySelectorAll('#anat .shot')),
      dots = [].slice.call(document.querySelectorAll('#anat .dots i')),
      aName = document.getElementById('anat-name'), aNum = document.getElementById('anat-n');
  function openAcc(i){
    items.forEach(function(it, j){ var on = j === i; it.classList.toggle('open', on); it.querySelector('button').setAttribute('aria-expanded', on); });
    if (i < 0) return;
    shots.forEach(function(s, j){ s.classList.toggle('on', j === i); });
    dots.forEach(function(d, j){ d.classList.toggle('on', j === i); });
    aName.textContent = items[i].querySelector('button span').textContent;
    aNum.textContent = (i + 1) + ' of ' + items.length;
    aName.classList.remove('swap'); void aName.offsetWidth; aName.classList.add('swap');
  }
  items.forEach(function(it, i){ it.querySelector('button').addEventListener('click', function(){ openAcc(it.classList.contains('open') ? -1 : i); }); });
  openAcc(0);

  /* process tabs with auto-advance */
  var data = [
    {h:'Consultation', p:'We understand the property, your appliances, budget and how many hours of backup you need.', t:['Site survey','Load audit','Budget'], img:'team-panels', cap:'technician on site', alt:'Technician handling a solar panel on site'},
    {h:'System design', p:'We recommend the right panels, inverter, batteries, protection gear and accessories for the job.', t:['Panels','Inverter','Battery sizing'], img:'diagram', cap:'system layout', alt:'6kW hybrid system layout drawing'},
    {h:'Delivery & installation', p:'We coordinate delivery, mounting, wiring, inverter and battery setup, and safety checks.', t:['Mounting','Wiring','Safety checks'], img:'roof', cap:'rooftop install', alt:'Panels mounted on a rooftop'},
    {h:'Testing & support', p:'We confirm the system works, explain how to use it, and keep WhatsApp support open after handover.', t:['Testing','Walkthrough','WhatsApp support'], img:'inverter-wall', cap:'clean indoor backup', alt:'Wall-mounted inverter and battery backup'}
  ];
  var IMG = {'team-panels':'https://palevioletred-panther-439834.hostingersite.com/wp-content/themes/solarconnect-custom/assets/img/6fd700f137.webp', diagram:'https://palevioletred-panther-439834.hostingersite.com/wp-content/themes/solarconnect-custom/assets/img/b645ffe928.webp', roof:'https://palevioletred-panther-439834.hostingersite.com/wp-content/themes/solarconnect-custom/assets/img/b40d931493.webp', 'inverter-wall':'https://palevioletred-panther-439834.hostingersite.com/wp-content/themes/solarconnect-custom/assets/img/90fc216d74.webp'};
  var tabs = [].slice.call(document.querySelectorAll('.tab')), proc = document.getElementById('process'), cur = 0, timer = null;
  var top = document.getElementById('step-top'), img = document.getElementById('step-img');
  function show(i){
    cur = i; var d = data[i];
    tabs.forEach(function(t, j){ t.setAttribute('aria-selected', j === i); });
    document.getElementById('step-n').textContent = 'Step ' + (i+1) + ' of 4';
    document.getElementById('step-h').textContent = d.h;
    document.getElementById('step-p').textContent = d.p;
    document.getElementById('step-tags').innerHTML = d.t.map(function(x){ return '<span>' + x + '</span>'; }).join('');
    document.getElementById('step-cap').textContent = 'Photo · ' + d.cap;
    img.style.visibility = ''; img.alt = d.alt; img.src = IMG[d.img]; img.style.objectFit = d.img === 'diagram' ? 'contain' : ''; img.style.background = d.img === 'diagram' ? '#fff' : '';
    top.classList.remove('swap'); void top.offsetWidth; top.classList.add('swap');
    restart();
  }
  function restart(){ clearTimeout(timer); if (!reduce && !proc.classList.contains('paused')) timer = setTimeout(function(){ show((cur + 1) % data.length); }, 6000); }
  tabs.forEach(function(t, i){ t.addEventListener('click', function(){ show(i); }); });
  proc.addEventListener('mouseenter', function(){ proc.classList.add('paused'); clearTimeout(timer); });
  proc.addEventListener('mouseleave', function(){ proc.classList.remove('paused'); restart(); });
  if ('IntersectionObserver' in window){ new IntersectionObserver(function(es){ if (es[0].isIntersecting) restart(); else clearTimeout(timer); }).observe(proc); }


  /* reviews carousel: 3 per view, auto-advance, seamless loop */
  var rv = document.getElementById('revs'), rt = document.getElementById('rev-track');
  if (rv && rt){
    var orig = [].slice.call(rt.children), n = orig.length, ri = 0, rtimer = null;
    orig.forEach(function(c){ var k = c.cloneNode(true); k.classList.remove('rv','pre'); k.setAttribute('aria-hidden','true'); rt.appendChild(k); });
    function stepW(){ var c = rt.children[0]; return c.getBoundingClientRect().width + 12; }
    function go(i, instant){ ri = i; rt.classList.toggle('jump', !!instant); rt.style.transform = 'translateX(' + (-ri * stepW()) + 'px)'; }
    rt.addEventListener('transitionend', function(){ if (ri >= n){ go(ri - n, true); } });
    function next(){ go(ri + 1); }
    function prev(){ if (ri <= 0){ go(n, true); void rt.offsetWidth; } go(ri - 1); }
    function auto(){ clearInterval(rtimer); if (!reduce) rtimer = setInterval(next, 4000); }
    document.getElementById('rev-next').addEventListener('click', function(){ next(); auto(); });
    document.getElementById('rev-prev').addEventListener('click', function(){ prev(); auto(); });
    rv.addEventListener('mouseenter', function(){ clearInterval(rtimer); });
    rv.addEventListener('mouseleave', auto);
    window.addEventListener('resize', function(){ go(ri, true); });
    auto();
  }


  /* about slideshow */
  var ash = document.getElementById('ashow');
  if (ash){
    var sl = [].slice.call(ash.querySelectorAll('.aslide')), dt = [].slice.call(ash.querySelectorAll('.adot')), cap = document.getElementById('ashow-cap'), ai = 0, at = null;
    function showA(i){ ai = (i + sl.length) % sl.length; sl.forEach(function(x, j){ x.classList.toggle('on', j === ai); }); dt.forEach(function(x, j){ x.classList.toggle('on', j === ai); if (j === ai) x.setAttribute('aria-current','true'); else x.removeAttribute('aria-current'); }); cap.textContent = sl[ai].querySelector('img').alt; }
    function runA(){ clearInterval(at); if (!reduce) at = setInterval(function(){ showA(ai + 1); }, 4000); }
    dt.forEach(function(d, j){ d.addEventListener('click', function(){ showA(j); runA(); }); });
    ash.addEventListener('mouseenter', function(){ clearInterval(at); }); ash.addEventListener('mouseleave', runA);
    runA();
  }

  /* shop filters */
  var fbtns = [].slice.call(document.querySelectorAll('#filters button')), prods = [].slice.call(document.querySelectorAll('#prods .prod'));
  fbtns.forEach(function(b){ b.addEventListener('click', function(){
    var f = b.dataset.f;
    fbtns.forEach(function(x){ x.setAttribute('aria-pressed', x === b); });
    prods.forEach(function(p, i){ p.hidden = f !== 'all' && p.dataset.c !== f; p.classList.remove('pre'); });
    var shown = prods.filter(function(p){ return !p.hidden; }).length;
    document.getElementById('filter-count').textContent = 'Showing ' + shown + ' product' + (shown === 1 ? '' : 's');
    var lbl = {all:'Browse all products', inv:'Browse all inverters', bat:'Browse all batteries', cc:'Browse all charge controllers'}[f];
    var href = {all:'https://solarconnectkenya.com/products', inv:'https://solarconnectkenya.com/product/c/solar-inverters', bat:'https://solarconnectkenya.com/product/c/solar-batteries', cc:'https://solarconnectkenya.com/product/c/solar-charger-controllers'}[f];
    document.querySelectorAll('.shop-all-lbl').forEach(function(el){ el.parentNode.href = href; });
    document.querySelectorAll('.shop-all-lbl').forEach(function(el){ el.textContent = lbl; });
  }); });

  /* quote form (demo) */
  var form = document.getElementById('qform'), msg = document.getElementById('q-msg'), phone = document.getElementById('q-phone');
  form.addEventListener('submit', function(e){
    e.preventDefault();
    var v = phone.value.replace(/\s+/g, '');
    msg.hidden = false;
    msg.textContent = /^(\+?254|0)7\d{8}$|^(\+?254|0)1\d{8}$/.test(v) ? 'Thanks. On the live site this sends your number to the Solar Connect team.' : 'Enter a Kenyan mobile number, for example 0706 636 447.';
  });
})();
</script>
})();
