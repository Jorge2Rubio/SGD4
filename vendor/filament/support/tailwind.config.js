import preset from './tailwind.config.preset'

export default {
    presets: [preset],
    content: ['./packages/**/*.blade.php'],
}
// tailwind.config.js
module.exports = {
    theme: {
      extend: {
        animation: {
          'fade-in': 'fadeIn 0.8s ease-out both',
        },
        keyframes: {
          fadeIn: {
            '0%': { opacity: 0, transform: 'translateY(20px)' },
            '100%': { opacity: 1, transform: 'translateY(0)' },
          },
        },
      },
    },
    plugins: [],
  }
  