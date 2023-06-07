function toggleInput(checkbox) {
    const input = checkbox.parentNode.nextElementSibling.querySelector('input[type="text"]');
    input.disabled = !checkbox.checked;
  }