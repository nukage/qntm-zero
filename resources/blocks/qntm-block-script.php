<?php

add_action('init', function () use ($block) {
    // Define the path to the block.json file
    $block_json_path = get_template_directory() . '/resources/blocks/' . $block . '/block.json';

    // Initialize an array for dependencies
    $dependencies = [];

    // Check if the block.json file exists
    if (file_exists($block_json_path)) {
        $block_json = json_decode(file_get_contents($block_json_path), true);

        // Check if dependencies exist
        if (isset($block_json['dependencies']) && is_array($block_json['dependencies'])) {
            // Collect all dependencies
            foreach ($block_json['dependencies'] as $dependency) {
                // Append it to the dependencies array
                $dependencies[] = $dependency; // Ensure the dependency name matches the registered script handle
            }
        }
    }

    // Register the block script with any dependencies
    wp_register_script(
        $block,
        get_template_directory_uri() . '/resources/blocks/' . $block . '/' . $block . '.js',
        $dependencies // Use the dependencies array
    );
});
