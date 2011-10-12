set :application,   "oahu-php-client"
set :repository,    "git://github.com/sixdegrees/oahu-php-client.git"
set :deploy_via,    :remote_cache
set :keep_releases, 4
set :scm,           :git
set :branch,        "develop"

set :user,          "oahu.neue.fr"
set :use_sudo,      false

role :app,          "phpclient.oahu.neue.fr"

set :deploy_to, "/home/domains/oahu.neue.fr/domains/phpclient.oahu.neue.fr/"



namespace :deploy do
  after "deploy:update_code" do
    run "ln -nfs #{shared_path}/config/staging.ini #{release_path}/example/config/staging.ini"
  end
end