<?php

class RedisModel extends Phalcon\Mvc\Model {
    protected static $redis = NULL;
    
    public function onConstruct() {
        self::$redis = new Redis();
        $isConnected = self::$redis->connect('127.0.0.1', 6379);
        
        if (!$isConnected) {
            throw new Exception('Could not connect to Redis server.');
        }
    }
    
    public function getLogs() {
        return self::$redis->zrange('logs', 0, 100, 'WITHSCORES');
    }
    
    public function saveLog($data = array()) {
        if (is_array($data)
            && count($data) > 0
            && isset($data['time'])
            && isset($data['email'])
        ) {
            return self::$redis->zadd('logs', $data['time'], $data['email']);
        }
        
        return 0;
    }
}