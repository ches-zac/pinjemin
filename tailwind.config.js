/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "node_modules/preline/dist/*.js",
  ],
  theme: {
    extend: {},
  },
  plugins: [
    require('@tailwindcss/forms'),
    require('preline/plugin'),
  ],
}

// /** @type {import('tailwindcss').Config} */

// export const content = [
//     './resources/**/*.blade.php',
//     './resources/**/*.js',
//     './resources/**/*.vue',
// ];
// export const theme = {
//     extend: {},
// };
// export const plugins = [];

