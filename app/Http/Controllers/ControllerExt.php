<?php namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Input;


    class ControllerExt extends Controller
    {
        public function PS_qFlashRedirect($message = 'your message here', $classSuffix = 'success', $inRoute = 'home') // changed to home 
        {
            session()->flash('message', $message . ' Psx');
            session()->flash('type', $classSuffix); // OPTIONS bs-class : info|success|danger|warning

            return redirect()->route($inRoute); // you redirect logic here..
            exit;
        }

        public function PS_exit($msg='Your Error Message Here')
        {
            header("Location: /home/?error=$msg&Psx");
            exit;
        }

        public function PS_getResultOrX($id, $skipAuth = false)
        {

            $classNameOnly =   ( new \ReflectionClass($this))->getShortName() ; 
            $dynamicModel =  "App\\".substr( $classNameOnly, 0, -10); 
            $modelName = new  $dynamicModel ;
            $pramod = $modelName::find($id);


            if ($pramod == null) {
                // do your event logging here
                $this->PS_exit('record not found_psx');
            }
            if ($skipAuth == false) {
                if (Auth::id() != $pramod->user_id) {
                    // do your event logging here
                    $this->PS_exit('not authorized_Psx');
                }
            }
            return $pramod;
        }
    }
