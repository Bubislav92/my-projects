document.addEventListener('DOMContentLoaded', () => {
    const spinner = document.getElementById('loading-spinner');
    spinner.style.display = 'flex';
  
    window.addEventListener('load', () => {
      spinner.style.display = 'none';
    });
  });