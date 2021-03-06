require 'json'

module MCStatus
  module Helpers
    module ServerHelper
      def get_latest_ping(server)
        key = "#{slug(server)}:last_ping"
        result = redis.get(key)

        if result.nil?
          last_ping = server.pings.first

          if last_ping
            result = {
              :name => server.name,
              :max_players => last_ping.max_players,
              :players_online => last_ping.players_online
            }.to_json

            redis.set(key, result)
            redis.expire(key, 1.minute)
          end
        end

        result
      end

      private
      def slug(server)
        server.name.downcase.gsub(/\w/, '-')
      end
    end
  end
end
