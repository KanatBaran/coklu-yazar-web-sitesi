/** DISCOVER (START) */
/** Paylas butonu */
function copyToClipboard(text) {
    // Geçici bir metin alanı oluştur
    const tempInput = document.createElement('input');
    tempInput.value = text;
    document.body.appendChild(tempInput);

    // Metni kopyala
    tempInput.select();
    tempInput.setSelectionRange(0, 99999); // Mobil uyumluluk için
    document.execCommand('copy');

    // Metin alanını kaldır
    document.body.removeChild(tempInput);

    // Bildirim göster
    alert('Yazıya ait link kopyalandı: ' + text);
}


/** uyarilar icin */
const toastElement = document.getElementById('liveToast');
if (toastElement) {
    const toast = new bootstrap.Toast(toastElement);
    //toast.show(); // Toast'u göster
    // 3 saniye sonra otomatik olarak kapat
    setTimeout(() => {
        toast.hide();
    }, 5000);
}


const toastElementLogout = document.getElementById('liveToastLogout');
if (toastElementLogout) {
    const toast = new bootstrap.Toast(toastElementLogout);
    //toast.show(); // Toast'u göster
    // 3 saniye sonra otomatik olarak kapat
    setTimeout(() => {
        toast.hide();
    }, 5000);
}

const toastElementPostSuccess = document.getElementById('success-post-toast');
if (toastElementPostSuccess) {
    const toast = new bootstrap.Toast(toastElementPostSuccess);
    //toast.show(); // Toast'u göster
    // 3 saniye sonra otomatik olarak kapat
    setTimeout(() => {
        toast.hide();
    }, 5000);
}

  // Toast'ları otomatik olarak kaldır
  setTimeout(() => {
    const toastLogin = document.getElementById('login-toast');
    const toastLogout = document.getElementById('logout-toast');
    if (toastLogin) {
      toastLogin.remove();
    }
    if (toastLogout) {
      toastLogout.remove();
    }
  }, 3000); // 3 saniye sonra kaldır
/** DISCOVER (END) */


/** COMMENT (START) */
/** Yorum silme islemi */
document.addEventListener('DOMContentLoaded', function() {
  const deleteButtons = document.querySelectorAll('.delete-comment');

  deleteButtons.forEach(button => {
      button.addEventListener('click', function() {
          const commentId = this.getAttribute('data-comment-id');
          const yaziId = this.getAttribute('data-yazi-id');

          Swal.fire({
              title: 'Bu yorumu silmek istediğinize emin misiniz?',
              text: "Bu işlem geri alınamaz!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#d33',
              cancelButtonColor: '#3085d6',
              confirmButtonText: 'Evet, sil!',
              cancelButtonText: 'İptal'
          }).then((result) => {
              if (result.isConfirmed) {
                  // Formu dinamik olarak oluştur
                  const form = document.createElement('form');
                  form.method = 'POST';
                  form.action = '/Projeler/BilgisayarAkademi/Config/config.php';

                  // Yorum ID'yi ekle
                  const commentIdInput = document.createElement('input');
                  commentIdInput.type = 'hidden';
                  commentIdInput.name = 'comment_id';
                  commentIdInput.value = commentId;
                  form.appendChild(commentIdInput);

                  // Yazı ID'yi ekle
                  const yaziIdInput = document.createElement('input');
                  yaziIdInput.type = 'hidden';
                  yaziIdInput.name = 'yazi_id';
                  yaziIdInput.value = yaziId;
                  form.appendChild(yaziIdInput);

                  // Yorum silme işlemini belirt
                  const actionInput = document.createElement('input');
                  actionInput.type = 'hidden';
                  actionInput.name = 'yorumSil';
                  actionInput.value = '1';
                  form.appendChild(actionInput);

                  // Formu body'ye ekle ve gönder
                  document.body.appendChild(form);
                  form.submit();
              }
          })
      });
  });
});
/** COMMENT (END) */

/** POST (START) */
/** Yazı silme işlemi */
document.addEventListener('DOMContentLoaded', function() {
    const deleteButtons = document.querySelectorAll('.delete-post');
  
    deleteButtons.forEach(button => {
        button.addEventListener('click', function() {
            const yaziId = this.getAttribute('data-yazi-id');
  
            Swal.fire({
                title: 'Bu yazıyı silmek istediğinize emin misiniz?',
                text: "Bu işlem geri alınamaz!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Evet, sil!',
                cancelButtonText: 'İptal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Formu dinamik olarak oluştur
                    const form = document.createElement('form');
                    form.method = 'POST';
                    form.action = '/Projeler/BilgisayarAkademi/Pages/postDelete.php';
  
                    // Yazı ID'sini ekle
                    const yaziIdInput = document.createElement('input');
                    yaziIdInput.type = 'hidden';
                    yaziIdInput.name = 'yazi_id';
                    yaziIdInput.value = yaziId;
                    form.appendChild(yaziIdInput);
  
                    // Yazı silme işlemini belirt
                    const actionInput = document.createElement('input');
                    actionInput.type = 'hidden';
                    actionInput.name = 'yaziSil';
                    actionInput.value = '1';
                    form.appendChild(actionInput);
  
                    // Formu body'ye ekle ve gönder
                    document.body.appendChild(form);
                    form.submit();
                }
            })
        });
    });
  });
/** POST (END) */

