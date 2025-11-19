module.exports = {
  content: [
    "./index.html",
    "./src/**/*.{html,js,ts,jsx,tsx,vue}",
  ],

  safelist: [
    {
      pattern: /bg-(red|green|blue|orange)-200/,
    },
  ],

  plugins: [require("daisyui")],
};