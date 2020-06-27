<?php namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class ControllerExt extends Controller
{

    public function isApiRequest() // TODO add this in gen

    {
        return (substr($_SERVER['REQUEST_URI'], 0, 5) == '/api/') ? true : false;
    }

    public function returnJsonError($id = null, $message = 'record not found or not authorized')
    {
        header("Content-type:application/json");
        exit(json_encode(['status' => 'error', 'success' => false, 'id' => $id, 'message' => $message]));

    }

    public function PS_qFlashRedirect($message = 'your message here', $classSuffix = 'success', $inRoute = 'home') // changed to home

    {
        session()->flash('message', $message . ' Psx');
        session()->flash('type', $classSuffix); // OPTIONS bs-class : info|success|danger|warning

        return redirect()->route($inRoute); // you redirect logic here..
        exit;
    }

    public function PS_getResultOrX($id, $skipAuth = false)
    {

        $classNameOnly = (new \ReflectionClass($this))->getShortName();
        if (substr($classNameOnly, 0, 3) == 'Api') {
            $classNameOnly = substr($classNameOnly, 3, strlen($classNameOnly));
        }

        $dynamicModel = "App\\" . substr($classNameOnly, 0, -10);
        $modelName = new $dynamicModel;
        $result = $modelName::find($id);

        if ($result == null) {
            // do your event logging here
            if (self::isApiRequest() == true) {
                // TODO extract this to a method with custom error messages
                $this->returnJsonError($id, 'record not found or not authorized ..');
            }
            $this->returnJsonError($id, 'record not found or not authorized ...'); // this may not be required
        }

        if ($skipAuth == false) {
            if (Auth::id() != $result->user_id) {
                // do your event logging here
                $this->returnJsonError($id, 'record not found or not authorized ....');
            }
        }

        return $result;
    }
}
