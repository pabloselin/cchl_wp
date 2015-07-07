module.exports = function(grunt) {
	//Project config
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
		less: {
			dist: {
				options: {
					paths: ['css'],
					compress: true
				},
				files: {
					'css/style-cchl.css':'less/main.less'
				}
			}
		},
		watch: {
			less: {
				files: ['less/*.less'],
				tasks: ['less']
			}
		}
	});
	//Load tasks plugins
	grunt.loadNpmTasks('grunt-contrib-less');
	grunt.loadNpmTasks('grunt-contrib-watch');
	//Default Tasks
	grunt.registerTask('default', ['less']);
}