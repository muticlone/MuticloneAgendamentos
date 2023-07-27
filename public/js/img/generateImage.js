async function generateImage() {
  try {
    const response = await fetch('/generate-image');
    const data = await response.json();
    const imageURLs = data.imageURLs;

    // Display the generated image on the web page
    const generatedImage = document.getElementById('generatedImage');
    generatedImage.src = imageURLs[0]; // Assuming you want to display the first generated image
    generatedImage.style.display = 'block'; // Show the image element

  } catch (error) {
    console.error('Erro ao gerar a imagem:', error);
  }
}

// Add event listener to the button
const button = document.getElementById('genelogo');
button.addEventListener('click', generateImage);