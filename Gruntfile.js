module.exports = function(grunt) {

    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-watch');

    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

        sass: {
            dist: {
                options: {
                    style: 'compressed'
                },
                files: {
                    'style.css': 'css/sass/style.scss'
                }
            }
        },

        watch: {
            sass: {
                files: 'css/sass/*.scss',
                tasks: 'sass'
            }
        }
    });

    grunt.registerTask('default', 'watch');
}