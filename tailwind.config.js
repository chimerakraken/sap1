const colors = require('tailwindcss/colors')

module.exports = {
  purge: [],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
      colors: {
        rose: colors.rose,
        gray: colors.coolGray,
        lime: colors.lime,
        amber: colors.amber,
        emerald: colors.emerald
      },
      transitionProperty: {
        'height': 'height',
        'spacing': 'margin, padding',
       }
    },
  },
  variants: {
    extend: {
      fontWeight: ['hover', 'focus'],
      
    },
  },
  plugins: [],
}
