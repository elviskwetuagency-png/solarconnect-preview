/* Content pages (About, Contact, FAQs): mobile menu toggle for the shared hero nav. */
(function(){
  var t = document.getElementById('menu-toggle'), m = document.getElementById('mmenu');
  if (!t || !m) return;
  function close(){ m.setAttribute('hidden',''); t.setAttribute('aria-expanded','false'); t.setAttribute('aria-label','Open menu'); }
  t.addEventListener('click', function(){
    var opening = m.hasAttribute('hidden');
    if (opening){ m.removeAttribute('hidden'); t.setAttribute('aria-expanded','true'); t.setAttribute('aria-label','Close menu'); }
    else close();
  });
  document.addEventListener('keydown', function(e){ if (e.key === 'Escape' && !m.hasAttribute('hidden')){ close(); t.focus(); } });
  m.addEventListener('click', function(e){ if (e.target.closest('a')) close(); });
})();

/* Contact page: compose the quote form into a WhatsApp message. */
(function(){
  var f = document.getElementById('ct-form');
  if (!f) return;
  var err = document.getElementById('ct-err');
  f.addEventListener('submit', function(e){
    e.preventDefault();
    var req = ['name','location','property','need'], bad = [];
    req.forEach(function(n){
      var el = f.elements[n], wrap = el.closest('.ct-f');
      var ok = el.value.trim() !== '';
      wrap.classList.toggle('bad', !ok);
      el.setAttribute('aria-invalid', ok ? 'false' : 'true');
      if (!ok) bad.push(el);
    });
    if (bad.length){ err.hidden = false; bad[0].focus(); return; }
    err.hidden = true;
    var v = function(n){ return f.elements[n].value.trim(); };
    var lines = [
      'Hello Solar Connect, I would like a recommendation.',
      '',
      'Name: ' + v('name'),
      'Area: ' + v('location'),
      'Property: ' + v('property'),
      'Need: ' + v('need')
    ];
    if (v('details')) lines.push('Appliances / hours of use: ' + v('details'));
    if (v('budget')) lines.push('Budget: ' + v('budget'));
    window.open('https://wa.me/254706636447?text=' + encodeURIComponent(lines.join('\n')), '_blank', 'noopener');
  });
  f.addEventListener('input', function(e){
    var w = e.target.closest('.ct-f');
    if (w && e.target.value.trim() !== '') { w.classList.remove('bad'); e.target.setAttribute('aria-invalid','false'); }
  });
})();
