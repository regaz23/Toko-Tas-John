<style>
  #toast-container {
      position: fixed;
      bottom: 20px;
      right: 20px;
      display: flex;
      flex-direction: column;
      gap: 10px;
      z-index: 9999;
  }
  .toast {
      background-color: var(--surface, #ffffff);
      color: var(--text, #333333);
      padding: 12px 20px;
      border-radius: 8px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.15);
      display: flex;
      align-items: center;
      gap: 12px;
      transform: translateX(120%);
      transition: transform 0.3s cubic-bezier(0.68, -0.55, 0.265, 1.55);
      min-width: 250px;
      border-left: 4px solid;
  }
  .toast.show {
      transform: translateX(0);
  }
  .toast-success { border-left-color: var(--success, #28a745); }
  .toast-error { border-left-color: var(--danger, #dc3545); }
  .toast-icon { font-size: 18px; font-weight: bold; }
  .toast-success .toast-icon { color: var(--success, #28a745); }
  .toast-error .toast-icon { color: var(--danger, #dc3545); }
  .toast-content { flex: 1; text-align: left; }
  .toast-title { font-weight: 600; font-size: 14px; margin-bottom: 2px; }
  .toast-message { font-size: 13px; color: var(--text-muted, #666666); }
</style>
<div id="toast-container"></div>
<script>
  function showToast(type, title, message) {
      const container = document.getElementById('toast-container');
      const toast = document.createElement('div');
      toast.className = 'toast toast-' + type;
      
      const icon = type === 'success' ? '?' : '?';
      
      toast.innerHTML = '<div class="toast-icon">' + icon + '</div>' +
          '<div class="toast-content">' +
              '<div class="toast-title">' + title + '</div>' +
              '<div class="toast-message">' + message + '</div>' +
          '</div>';
      
      container.appendChild(toast);
      
      // Trigger animation
      setTimeout(() => toast.classList.add('show'), 10);
      
      // Remove after 3s
      setTimeout(() => {
          toast.classList.remove('show');
          setTimeout(() => toast.remove(), 300);
      }, 3000);
  }
</script>
<?php /**PATH D:\DOWNLOAD\john-bag-shop-master\john-bag-shop-master\resources\views/components/toast.blade.php ENDPATH**/ ?>