
  function previewImage() {
    const fileInput = document.getElementById('foto');
    const preview = document.getElementById('preview');

    const file = fileInput.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = function(e) {
        preview.src = e.target.result; // Define o src da imagem com o conteúdo da imagem carregada
      }
      reader.readAsDataURL(file); // Converte a imagem para uma URL temporária para visualização
    }
  }