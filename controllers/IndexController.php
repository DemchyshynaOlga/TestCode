<?php

/**
 * Class IndexController
 */
class IndexController
{

    /**
     * @param $data
     * @param $type
     */
    public function actionIndex($data, $type)
    {
        $errorRepository = new ArrayErrorRepository;
        $handler = new RegisterErrorHandler($errorRepository);
        $validationFields = Config::getValidationFields();
        
        foreach ($data as $key => $value) {
            if (isset($validationFields[$key])) {
                $model = ModelFactory::get($key, $value);
                if ($model->validate()) {
                    $handler->handle($model->validate());
                }
            }
        }

        View::action(Helper::prepareResponsData($type, [
                'Valid' => empty($errorRepository->get()),
                'Errors' => $errorRepository->get()
            ]
        ),$type);
    }
}