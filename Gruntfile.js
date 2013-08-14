module.exports = function(grunt) {

  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    compass: {
      dist: {
        options: {
          config: 'config.rb',
          force: true
        }
      }
    },
    watch: {
      dist: {
        files: 'scss/**',
        tasks: ['compass'],
        options: {
          livereload: 1337
        }
      }
    }
  });

  grunt.loadNpmTasks('grunt-contrib-compass');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.registerTask('default', ['watch']);
};