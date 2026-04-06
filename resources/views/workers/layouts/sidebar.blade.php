<!-- Sidebar -->
<button id="close-sidebar" class="absolute top-4 right-4 text-gray-700 lg:hidden bg-[#fff] border-[1px] rounded-[100px]">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
    </svg>
</button>
<div id="sidebar"
    class="sidebar sidebar fixed left-0 top-0 h-full md:w-[220px] w-64 z-50 transform -translate-x-full lg:translate-x-0 transition-transform duration-300">
    <a href="{{ route('worker.appointment.index') }}" class="logo mb-[150px]  block">Super Técnico 24</a>

    <nav>
        <a href="{{ route('worker.appointment.index') }}"
            class="nav-item {{ request()->routeIs('worker.appointment.index') ? 'active' : '' }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
            <span class="nav-text">Appointments</span>
        </a>
        <a href="{{ route('worker.message.index') }}" class="nav-item {{ request()->routeIs('worker.message.index') ? 'active' : '' }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 28 28" fill="none">
                <path
                    d="M22.5677 26.5208C22.8078 26.5208 23.0447 26.6121 23.2249 26.7862C24.3769 27.8986 26.0572 28.2689 27.551 27.8053C26.5896 25.8026 26.4564 23.5081 27.2014 21.3836C28.126 18.7404 28.3576 16.0911 27.3054 13.434C26.381 11.0998 24.5971 9.16055 22.3394 8.05469C22.4783 8.79516 22.5483 9.54964 22.5483 10.3121C22.5484 13.5484 21.3039 16.5922 19.0444 18.8829C16.7846 21.1739 13.7553 22.4621 10.5147 22.5103C9.91264 22.5197 9.31328 22.4843 8.7207 22.4062C10.5017 25.528 13.8606 27.5612 17.5516 27.6159C19.1662 27.6409 20.7166 27.3026 22.1604 26.6131C22.2904 26.5509 22.4296 26.5208 22.5677 26.5208V26.5208Z"
                    fill="#BFBFBF" />
                <path
                    d="M10.5409 0.00205732C4.79219 -0.112091 0.0134043 4.53854 -0.00045711 10.286C-0.00385315 11.6903 0.270256 13.0517 0.814315 14.3328C0.822216 14.3514 0.829563 14.3703 0.836216 14.3894C1.5812 16.5139 1.44806 18.8083 0.486632 20.8111C1.98054 21.2745 3.66068 20.9043 4.8127 19.7919C5.09651 19.5177 5.52116 19.4487 5.87726 19.6189C7.32085 20.3084 8.87138 20.6477 10.486 20.6218C16.1897 20.5371 20.6576 16.0082 20.6575 10.3114C20.6576 4.73891 16.1192 0.114196 10.5409 0.00205732V0.00205732ZM4.81894 11.8514C3.99301 11.8514 3.32343 11.1829 3.32343 10.3584C3.32343 9.53384 3.99301 8.86537 4.81894 8.86537C5.64487 8.86537 6.31444 9.53384 6.31444 10.3584C6.31437 11.1829 5.64487 11.8514 4.81894 11.8514ZM10.3286 11.8514C9.50263 11.8514 8.83306 11.1829 8.83306 10.3584C8.83306 9.53384 9.50263 8.86537 10.3286 8.86537C11.1545 8.86537 11.8241 9.53384 11.8241 10.3584C11.8241 11.1829 11.1545 11.8514 10.3286 11.8514ZM15.8383 11.8514C15.0123 11.8514 14.3427 11.1829 14.3427 10.3584C14.3427 9.53384 15.0123 8.86537 15.8383 8.86537C16.6642 8.86537 17.3338 9.53384 17.3338 10.3584C17.3338 11.1829 16.6642 11.8514 15.8383 11.8514Z"
                    fill="#BFBFBF" />
            </svg>
            <span class="nav-text">Message</span>
        </a>
    </nav>
</div>
