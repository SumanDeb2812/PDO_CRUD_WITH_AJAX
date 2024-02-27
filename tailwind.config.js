/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./*.{html,php}"],
  theme: {
    extend: {
      keyframes: {
        popup: {
          '0%': { transform: 'scale(0.25)' },
          '100%': { transform: 'scale(1)' }
        }
      }
    },
  },
  plugins: [],
}

