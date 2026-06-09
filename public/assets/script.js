// Smooth scroll
document.querySelectorAll("nav a").forEach(link => {
  link.addEventListener("click", function(e) {
    e.preventDefault();
    const target = document.querySelector(this.getAttribute("href"));
    target.scrollIntoView({
      behavior:<script>
  // 1. Fungsi Pindah Tab Menu (Sidebar)
  function switchTab(tabName) {
    document.querySelectorAll('.content-section').forEach(sec => sec.classList.remove('active'));
    document.querySelectorAll('.sidebar-menu li').forEach(li => li.classList.remove('active'));
    
    // Validasi agar tidak eror jika ID tidak ditemukan
    if(document.getElementById('sec-' + tabName)) {
      document.getElementById('sec-' + tabName).classList.add('active');
    }
    if(document.getElementById('nav-' + tabName)) {
      document.getElementById('nav-' + tabName).classList.add('active');
    }
  }

  // 2. Fungsi Membuka Pop-up Form (Tambah / Edit)
  function openModal(modalId, titleText, idVal = '', nameVal = '', linkVal = '') {
    if(document.getElementById(modalId)) {
      document.getElementById(modalId).classList.add('show');
    }
    
    if(modalId === 'modal-dokumen') {
      if(document.getElementById('dokumen-title')) document.getElementById('dokumen-title').innerHTML = `<h2>${titleText}</h2>`;
      if(document.getElementById('doc-id')) document.getElementById('doc-id').value = idVal;
      if(document.getElementById('doc-name')) document.getElementById('doc-name').value = nameVal;
      if(document.getElementById('doc-link')) document.getElementById('doc-link').value = linkVal;
      
      // Amankan bagian pengalihan Action Form agar tidak bikin JS crash
      var formDokumen = document.getElementById('form-dokumen');
      if(formDokumen) {
          if(idVal !== '') {
              formDokumen.action = 'proses_edit_dokumen.php';
          } else {
              formDokumen.action = 'proses_tambah_dokumen.php';
          }
      }
    }
  }

  // 3. Fungsi Menutup Pop-up Form
  function closeModal(modalId) {
    if(document.getElementById(modalId)) {
      document.getElementById(modalId).classList.remove('show');
    }
  }

  // 4. Fungsi Konfirmasi Hapus Data
  function confirmDelete(id, name) {
      if (confirm(`Apakah Anda yakin ingin menghapus dokumen "${name}"?`)) {
          window.location.href = 'proses_hapus_dokumen.php?id=' + id;
      }
  }
</script> "smooth"
    });
  });
});

// ===== TAMBAHAN ACTIVITY SCROLL =====
const container = document.querySelector('.activity-wrapper');

if (container) {
  let isDown = false;
  let startX;
  let scrollLeft;

  container.addEventListener('mousedown', (e) => {
    isDown = true;
    startX = e.pageX - container.offsetLeft;
    scrollLeft = container.scrollLeft;
  });

  container.addEventListener('mouseleave', () => isDown = false);
  container.addEventListener('mouseup', () => isDown = false);

  container.addEventListener('mousemove', (e) => {
    if (!isDown) return;
    e.preventDefault();
    const x = e.pageX - container.offsetLeft;
    const walk = (x - startX) * 2;
    container.scrollLeft = scrollLeft - walk;
  });

// cek apakah nyambung
console.log("JS nyambung");

// navbar scroll
window.addEventListener("scroll", function() {
  let navbar = document.querySelector(".navbar");
  if (navbar) {
    navbar.classList.toggle("scrolled", window.scrollY > 50);
  }
});

