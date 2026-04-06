// Super Técnico 24 - Worker Dashboard JavaScript

document.addEventListener('DOMContentLoaded', function() {
    // Mobile navigation handling (if used)
    const mobileNavToggle = document.querySelector('.mobile-nav-toggle');
    if (mobileNavToggle) {
      mobileNavToggle.addEventListener('click', function() {
        const sidebar = document.querySelector('.sidebar');
        sidebar.classList.toggle('active');
      });
    }
    
    // Search functionality for appointments
    const appointmentSearch = document.getElementById('appointmentSearch');
    if (appointmentSearch) {
      appointmentSearch.addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();
        const appointments = document.querySelectorAll('.appointment-item');
        
        appointments.forEach(appointment => {
          const text = appointment.textContent.toLowerCase();
          if (text.includes(searchTerm)) {
            appointment.style.display = '';
          } else {
            appointment.style.display = 'none';
          }
        });
      });
    }
    
    // Chat functionality
    setupChatFunctionality();
    
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
        // In a real app, this would trigger re-sorting of the appointments
        console.log('Sort changed to:', this.value);
      });
    }
  });
  
  // Setup chat functionality
  function setupChatFunctionality() {
    // Chat user list item click handler
    const chatUserItems = document.querySelectorAll('.chat-user-item');
    if (chatUserItems.length > 0) {
      chatUserItems.forEach(item => {
        item.addEventListener('click', function() {
          // Remove active class from all chat user items
          chatUserItems.forEach(i => i.classList.remove('active'));
          // Add active class to clicked item
          this.classList.add('active');
          
          // In a real app, this would load the chat history with this user
          const userName = this.querySelector('.chat-user-name').textContent;
          console.log('Loading chat with:', userName);
          
          // Remove message indicator if present
          const indicator = this.querySelector('.message-indicator');
          if (indicator) {
            indicator.remove();
          }
        });
      });
    }
    
    // Chat send button click handler
    const chatSendBtn = document.querySelector('.chat-send-btn');
    const chatInput = document.querySelector('.chat-input');
    if (chatSendBtn && chatInput) {
      chatSendBtn.addEventListener('click', function() {
        sendMessage();
      });
      
      // Allow pressing Enter to send messages
      chatInput.addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
          e.preventDefault();
          sendMessage();
        }
      });
    }
    
    // Attachment button click handler
    const attachmentBtn = document.querySelector('.attachment-btn');
    if (attachmentBtn) {
      attachmentBtn.addEventListener('click', function() {
        // In a real app, this would open a file picker
        alert('File attachment functionality would be implemented here.');
      });
    }
    
    // Accept button click handler
    const acceptBtn = document.querySelector('.accept-button');
    if (acceptBtn) {
      acceptBtn.addEventListener('click', function() {
        this.textContent = 'Accepted';
        this.disabled = true;
        this.style.backgroundColor = '#ccc';
        
        // In a real app, this would send an API request to accept the appointment/request
        showNotification('Request accepted successfully!');
      });
    }
  }
  
  // Function to send a chat message
  function sendMessage() {
    const chatInput = document.querySelector('.chat-input');
    const messagesContainer = document.querySelector('.chat-messages');
    
    if (chatInput.value.trim() === '') return;
    
    // Create new message element
    const messageElement = document.createElement('div');
    messageElement.className = 'message message-sent';
    
    // Add message text
    const messageText = document.createElement('div');
    messageText.textContent = chatInput.value;
    messageElement.appendChild(messageText);
    
    // Add timestamp
    const timestamp = document.createElement('div');
    timestamp.className = 'message-time';
    const now = new Date();
    timestamp.textContent = `${now.getHours()}:${now.getMinutes().toString().padStart(2, '0')}`;
    messageElement.appendChild(timestamp);
    
    // Add to messages container
    messagesContainer.appendChild(messageElement);
    
    // Clear input
    chatInput.value = '';
    
    // Scroll to bottom
    messagesContainer.scrollTop = messagesContainer.scrollHeight;
    
    // Simulate response after delay (for demo purposes)
    setTimeout(() => {
      const responseElement = document.createElement('div');
      responseElement.className = 'message message-received';
      
      const responseText = document.createElement('div');
      responseText.textContent = 'This is a simulated response. In a real application, this would be a response from the server.';
      responseElement.appendChild(responseText);
      
      const responseTimestamp = document.createElement('div');
      responseTimestamp.className = 'message-time';
      const responseTime = new Date();
      responseTimestamp.textContent = `${responseTime.getHours()}:${responseTime.getMinutes().toString().padStart(2, '0')}`;
      responseElement.appendChild(responseTimestamp);
      
      messagesContainer.appendChild(responseElement);
      messagesContainer.scrollTop = messagesContainer.scrollHeight;
    }, 1000);
  }
  
  // Notification system
  function showNotification(message, type = 'success') {
    // Create notification element
    const notification = document.createElement('div');
    notification.className = `fixed top-5 right-5 p-4 rounded-lg shadow-lg z-50 transition-opacity duration-300 opacity-0`;
    
    // Set background color based on type
    if (type === 'success') {
      notification.classList.add('bg-green-500', 'text-white');
    } else if (type === 'error') {
      notification.classList.add('bg-red-500', 'text-white');
    } else {
      notification.classList.add('bg-blue-500', 'text-white');
    }
    
    notification.textContent = message;
    document.body.appendChild(notification);
    
    // Show notification
    setTimeout(() => {
      notification.classList.remove('opacity-0');
      notification.classList.add('opacity-100');
    }, 10);
    
    // Auto-hide after 3 seconds
    setTimeout(() => {
      notification.classList.remove('opacity-100');
      notification.classList.add('opacity-0');
      
      setTimeout(() => {
        notification.remove();
      }, 300);
    }, 3000);
  }