<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
        <h5>Anónimo</h5>
        <a class="d-block" href="javascript:{}" onclick="document.getElementById('logout-form').submit();">Logout</a>
         @auth
	        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
	            @csrf
	        </form>
        @endauth
    </div>
</aside>

  