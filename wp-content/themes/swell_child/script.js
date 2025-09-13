var completeForm = document.querySelector('.mw_wp_form_complete');
if(completeForm) {
  var header = document.createElement('h2');
  header.textContent = 'お問い合わせありがとうございます';
  header.classList.add('my-2');
  completeForm.appendChild(header);
  var p = document.createElement('p');
  p.textContent = 'お問い合わせ頂いた内容を確認した上、担当者よりご連絡いたします';
  p.style.color = '#032651';
  completeForm.appendChild(p);
}

var topBottomForm = document.getElementById('mw_wp_form_mw-wp-form-32223');
if (topBottomForm) {
  var bottomDescription = document.getElementById('bottom_form_description');
  if(bottomDescription) {
    if(topBottomForm.classList.contains('mw_wp_form_preview') || topBottomForm.classList.contains('mw_wp_form_complete')) {
      // topBottomForm.scrollIntoView(true);
      bottomDescription.scrollIntoView();
      bottomDescription.style.display = 'none';
    }
  }
}
