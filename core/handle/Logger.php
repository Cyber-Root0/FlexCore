<?php

namespace FlexCore\handle;
use Psr\Log\LoggerInterface;
class Logger implements LoggerInterface
{    
    private string $fileName= '';
    /**
     * __construct
     *
     * @param  mixed $pathlog
     * @return void
     */
    public function __construct(protected string $pathlog){
        $this->fileName = $pathlog.'/'.date('Y-m-d').'.log';
    }      
    /**
     * log
     *
     * @param  mixed $level
     * @param  mixed $message
     * @param  mixed $context
     * @return void
     */
    public function log($level, string|\Stringable $message, array $context = []): void{
        $this->render(__METHOD__, $message);
    }    
    /**
     * emergency
     *
     * @param  mixed $message
     * @param  mixed $context
     * @return void
     */
    public function emergency(string|\Stringable $message, array $context = []) : void{
        $this->render(__METHOD__, $message);
    }
    
    /**
     * alert
     *
     * @param  mixed $message
     * @param  mixed $context
     * @return void
     */
    public function alert(string|\Stringable $message, array $context = []) : void{
        $this->render(__METHOD__, $message);
    }
    
    /**
     * critical
     *
     * @param  mixed $message
     * @param  mixed $context
     * @return void
     */
    public function critical(string|\Stringable $message, array $context = []) : void{
        $this->render(__METHOD__, $message);
    }
    /**
     * error
     *
     * @param  mixed $message
     * @param  mixed $context
     * @return void
     */
    public function error(string|\Stringable $message, array $context = []) : void{
        $this->render(__METHOD__, $message);
    }
    /**
     * warning
     *
     * @param  mixed $message
     * @param  mixed $context
     * @return void
     */
    public function warning(string|\Stringable $message, array $context = []) : void{
        $this->render(__METHOD__, $message);
    }
    
    /**
     * notice
     *
     * @param  mixed $message
     * @param  mixed $context
     * @return void
     */
    public function notice(string|\Stringable $message, array $context = []) : void{
       
        $this->render(__METHOD__, $message);
        
    }    
    /**
     * info
     *
     * @param  mixed $message
     * @param  mixed $context
     * @return void
     */
    public function info(string|\Stringable $message, array $context = []) : void{
        $this->render(__METHOD__, $message);
    }    
    /**
     * debug
     *
     * @param  mixed $message
     * @param  mixed $context
     * @return void
     */
    public function debug(string|\Stringable $message, array $context = []) : void{
        $this->render(__METHOD__, $message);
    }
    public function render($id, $message){
        $hr = date("h:i");
        $template = "{$id} -  {$hr} -> $message";
        $old = '';
        
        if (file_exists($this->fileName)) {
            $old = file_get_contents($this->fileName);
        }
    
        $old.= "\n".$template;
        file_put_contents($this->fileName, $old);
    }
}