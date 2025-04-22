

<footer class=" bottom-0 w-full ">
          <div class="py-4 text-center">
            <p class="text-gray-600 text-sm">© 2025 EventCraft. All rights reserved.</p>
          </div>
</footer>
<script>
    document.addEventListener('DOMContentLoaded', function() {
      const tabButtons = document.querySelectorAll('.tab-button');
      const tabContents = document.querySelectorAll('.tab-content');

      tabButtons.forEach(button => {
        button.addEventListener('click', () => {
          // Remove active class from all buttons and contents
          tabButtons.forEach(btn => btn.classList.remove('active', 'bg-white', 'shadow-sm', 'text-gray-800'));
          tabButtons.forEach(btn => btn.classList.add('text-gray-600'));
          tabContents.forEach(content => content.classList.remove('active'));

          // Add active class to clicked button and corresponding content
          button.classList.add('active', 'bg-white', 'shadow-sm', 'text-gray-800');
          button.classList.remove('text-gray-600');
          const tabId = button.getAttribute('data-tab');
          document.getElementById(tabId).classList.add('active');
        });
      });
    });
  </script>

