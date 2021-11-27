const { VueLoaderPlugin } = require("vue-loader");

module.exports = {
    module: {
        rules: [
            {
                test: /\.vue$/,
                loader: "vue-loader",
            },
            // this will apply to both plain `.scss` files
            // AND `<style lang="scss">` blocks in `.vue` files
            {
                test: /\.scss$/,
                use: ["vue-style-loader", "css-loader", "sass-loader"],
            },
            {
                test: /\.pug$/,
                oneOf: [
                    // this applies to `<template lang="pug">` in Vue components
                    {
                        resourceQuery: /^\?vue/,
                        use: ["pug-plain-loader"],
                    },
                    // this applies to pug imports inside JavaScript
                    {
                        use: ["raw-loader", "pug-plain-loader"],
                    },
                ],
            },

            // ... other rules
        ],
    },
    plugins: [
        // make sure to include the plugin!
        new VueLoaderPlugin(),
    ],
};
