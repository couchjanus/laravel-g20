module.exports = {
  future: {
    // removeDeprecatedGapUtilities: true,
    // purgeLayersByDefault: true,
  },
  purge: [],
  theme: {
    extend: {},
  },
  variants: {},
  plugins: [
    require('tailwindcss-plugins/pagination')({
        /* Customizations here... */
        color: colors['pink-dark'],
        wrapper: 'inline-flex list-reset shadow rounded'
    }),
  ],
}
