/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./node_modules/flowbite/**/*.js",
  ],
  theme: {
    extend: {
      fontFamily: {
        inter: ["Inter", "Sans Serif"],
        roboto: ["Roboto", "Sans Serif"],
      }
    },
  },
  plugins: [
    require('flowbite/plugin'),
  ],
}

