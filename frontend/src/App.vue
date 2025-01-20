<template>
  <div>
    <!-- Navbar -->
    <nav class="bg-primary text-white p-4 sticky top-0 z-50">
      <div class="container mx-auto flex justify-between items-center">
        <!-- Logo -->
        <a href="/" class="flex items-center space-x-2">
          <img :src="images.SesamaBerbagi" alt="Sesama Berbagi Logo" class="h-10 w-10" />
          <span class="text-xl font-semibold">Sesama Berbagi</span>
        </a>

        <!-- Hamburger Button (Mobile Only) -->
        <button 
          @click="isMenuOpen = !isMenuOpen" 
          class="lg:hidden focus:outline-none text-white"
          aria-label="Toggle Menu"
        >
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16m-7 6h7" />
          </svg>
        </button>

        <!-- Navbar Links -->
        <ul
          :class="{
            'hidden': !isMenuOpen,
            'block': isMenuOpen,
          }"
          class="absolute bg-primary w-full top-16 left-0 lg:static lg:bg-transparent lg:flex lg:space-x-4 lg:items-center lg:w-auto lg:block"
        >
          <li class="p-2 border-b lg:border-none">
            <router-link to="/" class="hover:text-primaryhover block text-center lg:inline">Home</router-link>
          </li>
          <li class="p-2 border-b lg:border-none">
            <router-link to="/about" class="hover:text-primaryhover block text-center lg:inline">Tentang Kami</router-link>
          </li>
          <li class="p-2">
            <router-link to="/contact" class="hover:text-primaryhover block text-center lg:inline">Kontak</router-link>
          </li>
        </ul>
      </div>
    </nav>

    <!-- Main content area -->
    <router-view></router-view>

    <!-- Other components -->

  </div>
</template>

<script>
import images from '@/assets/index.js';

export default {
  data() {
    return {
      images,
      isMenuOpen: false // State untuk mengontrol menu
    };
  }
};
</script>

<style scoped>
/* Menambahkan transisi animasi opsional */
</style>
