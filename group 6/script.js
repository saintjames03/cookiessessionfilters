document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById('contactForm');
  const formMessage = document.getElementById('formMessage');

  form.addEventListener('submit', function (event) {
    event.preventDefault(); // Prevent the default form submission

    const formData = new FormData(form);

    fetch('submit.php', {
      method: 'POST',
      body: formData
    })
      .then(response => response.text())
      .then(result => {
        formMessage.innerHTML = '<p>Thank you for your message!</p>';
        form.reset();
      })
      .catch(error => {
        formMessage.innerHTML = '<p>There was an error. Please try again later.</p>';
      });
  });
});