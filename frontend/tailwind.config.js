/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./index.html",
    "./src/**/*.{vue,js,ts,jsx,tsx}",
  ],
  theme: {
    extend: {
      colors: {
        'primary': '#433D8B',
        'secondary': '#C8ACD6',
        'ternary': '#2E236C',
        'accent': '#17153B',
        'success': '#79BD8F',
        'success-accent': '#BEEB9F',
        'warning': '#D54062',
        'warning-accent': '#F5A9B8',
        'error': '#FFA447',
        'error-accent': '#FFDCA8',
      },
    },
    fontFamily: {
      sans: ['Raleway', 'sans-serif'],
    },
    container: {
      padding: {
        DEFAULT: '1rem',
        sm: '2rem',
        lg: '4rem',
        xl: '5rem',
        '2xl': '6rem',
      },
      center: true,
    },
    screens: {
      'sm': '640px',
      'md': '768px',
      'lg': '1024px',
      'xl': '1280px',
      '2xl': '1536px',
    },
  },
  plugins: [],
}

