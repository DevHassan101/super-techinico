// Super Técnico 24 - Main JavaScript

document.addEventListener('DOMContentLoaded', function() {
  // Password visibility toggle
  const passwordToggles = document.querySelectorAll('.password-toggle');
  passwordToggles.forEach(toggle => {
    toggle.addEventListener('click', function() {
      const passwordField = this.closest('.form-group').querySelector('input');
      if (passwordField.type === 'password') {
        passwordField.type = 'text';
        this.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>';
      } else {
        passwordField.type = 'password';
        this.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path><line x1="1" y1="1" x2="23" y2="23"></line></svg>';
      }
    });
  });
  
  // Search functionality
  const searchInputs = document.querySelectorAll('.search-input');
  searchInputs.forEach(input => {
    input.addEventListener('input', function() {
      const searchTerm = this.value.toLowerCase();
      const items = document.querySelectorAll('.searchable-item');
      
      items.forEach(item => {
        const text = item.textContent.toLowerCase();
        if (text.includes(searchTerm)) {
          item.style.display = '';
        } else {
          item.style.display = 'none';
        }
      });
    });
  });
  
  // Form validation
  const forms = document.querySelectorAll('form');
  forms.forEach(form => {
    form.addEventListener('submit', function(event) {
      let valid = true;
      
      // Validate required fields
      const requiredFields = form.querySelectorAll('[required]');
      requiredFields.forEach(field => {
        if (!field.value.trim()) {
          valid = false;
          field.classList.add('border-red-500');
          
          field.addEventListener('input', function() {
            field.classList.remove('border-red-500');
          }, { once: true });
        }
      });
      
      // Password confirmation validation
      const password = form.querySelector('input[name="password"]');
      const confirmPassword = form.querySelector('input[name="confirmPassword"]');
      if (password && confirmPassword && password.value !== confirmPassword.value) {
        valid = false;
        confirmPassword.classList.add('border-red-500');
        alert('Passwords do not match');
        
        confirmPassword.addEventListener('input', function() {
          confirmPassword.classList.remove('border-red-500');
        }, { once: true });
      }
      
      if (!valid) {
        event.preventDefault();
      }
    });
  });
  
  // Worker actions setup (edit, delete, approve)
  setupWorkerActions();
  
  // Pagination handling
  const paginationItems = document.querySelectorAll('.pagination-item');
  paginationItems.forEach(item => {
    item.addEventListener('click', function() {
      paginationItems.forEach(i => i.classList.remove('active'));
      this.classList.add('active');
    });
  });
  
  // Sort dropdown change handling
  const sortDropdown = document.getElementById('sortDropdown');
  if (sortDropdown) {
    sortDropdown.addEventListener('change', function() {
      // In a real app, this would trigger re-sorting of the list
      console.log('Sort changed to:', this.value);
    });
  }
});

// Setup worker action buttons functionality
function setupWorkerActions() {
  // Edit buttons
  const editButtons = document.querySelectorAll('.edit-button, [title="Edit"]');
  editButtons.forEach(button => {
    button.addEventListener('click', function() {
      const item = this.closest('.worker-item');
      const name = item.querySelector('.worker-name').textContent;
      // In a real app, this would navigate to edit page or open modal
      console.log(`Editing: ${name}`);
    });
  });
  
  // Delete buttons
  const deleteButtons = document.querySelectorAll('.delete-button, [title="Delete"]');
  deleteButtons.forEach(button => {
    button.addEventListener('click', function() {
      const item = this.closest('.worker-item');
      const name = item.querySelector('.worker-name').textContent;
      if (confirm(`Are you sure you want to delete ${name}?`)) {
        // In a real app, this would call an API
        item.remove();
        // showNotification('Item deleted successfully');
      }
    });
  });
  
  // Approve buttons for registration requests
  const approveButtons = document.querySelectorAll('[title="Approve"]');
  approveButtons.forEach(button => {
    if (button.disabled) return;
    
    button.addEventListener('click', function() {
      const item = this.closest('.worker-item');
      const statusTag = item.querySelector('.status-tag');
      
      // In a real app, this would call an API
      statusTag.textContent = 'Accepted';
      statusTag.classList.remove('status-pending');
      statusTag.classList.add('status-accepted');
      
      this.disabled = true;
      this.querySelector('svg').setAttribute('stroke', '#aaaaaa');
      
    //   showNotification('Worker request approved');
    });
  });
}
