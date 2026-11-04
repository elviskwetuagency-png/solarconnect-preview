/* About templates: mobile menu toggle for the shared hero nav. */
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
