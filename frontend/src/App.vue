<template>
  <div>
    <!-- Navbar -->
    <nav class="bg-primary text-white p-4">
      <div class="container mx-auto flex justify-between items-center">
        <a href="/" class="flex items-center space-x-2">
          <img :src="images.SesamaBerbagi" alt="Sesama Berbagi Logo" class="h-10 w-10" />
          <span class="text-xl font-semibold">Sesama Berbagi</span>
        </a>
        <ul class="flex space-x-4">
          <li><router-link to="/" class="hover:text-primaryhover">Home</router-link></li>
          <li><router-link to="/about" class="hover:text-primaryhover">About</router-link></li>
          <li><router-link to="/contact" class="hover:text-primaryhover">Contact</router-link></li>
        </ul>
      </div>
    </nav>

    <!-- Main content area -->
    <router-view></router-view>

    <!-- Other components -->
    <MyComponent />
  </div>
</template>

<script>
import MyComponent from './components/MyComponent.vue';
import images from '@/assets/index.js';

export default {
  components: {
    MyComponent
  },
  data() {
    return {
      images
    };
  }
};
</script>

<style scoped>
/* Style tambahan jika dibutuhkan */
</style>
