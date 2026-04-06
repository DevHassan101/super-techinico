<style>
    .login-btn{
    transition:0.3s;
}
.login-btn:hover{
    transform:scale(1.05);
}
</style>
<button {{ $attributes->merge(['type' => 'submit', 'class' => 'login-btn py-2 xl:py:3 px-4 text-center !bg-[#FF71A6] transition-transform duration-300 hover:scale-105  rounded-md text-white text-sm   font-medium']) }}>
    {{ $slot }}
</button>
