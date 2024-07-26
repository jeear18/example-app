/** @type {import('tailwindcss').Config} */
// export default {
//   content: [],
//   theme: {
//     extend: {},
//   },
//   plugins: [],
// }

module.exports =  {
  // content: ["./src/**/*.{html,js}"],
  content: [
    './storage/framework/views/*.php',
    './resources/views/**/*.blade.php',
    './resources/js/**/*.vue',
  ],
  theme: {
    extend: {},
  },
  plugins: [
     require('@tailwindcss/forms'),
    // require( '@tailwindcss/forms'),
  ],
}
