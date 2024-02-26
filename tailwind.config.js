/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./*.php"],
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

