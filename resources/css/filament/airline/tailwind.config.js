import preset from '../../../../vendor/filament/filament/tailwind.config.preset'

export default {
    presets: [preset],
    content: [
        './app/Filament/Airline/**/*.php',
        './resources/views/filament/airline/**/*.blade.php',
        './vendor/filament/**/*.blade.php',
    ],
}
