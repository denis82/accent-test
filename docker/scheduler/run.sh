
# Add scheduler job to crontab
# echo '* *  * * *    php /var/www/artisan schedule:run' | crontab

while :; do
	# Execute command
	#echo 'TICK';
	php /var/www/artisan schedule:run &
	sleep 60;
done;
