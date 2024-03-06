<?php

declare(strict_types=1);

namespace App\Controller;

use Cake\View\JsonView;

/**
 * Pots Controller
 *
 * @property \App\Model\Table\PotsTable $Pots
 */
class PotsController extends AppController
{
    /**
     * Initialization hook method.
     *
     * @return void
     */
    public function initialize(): void
    {
        parent::initialize();

        $this->viewBuilder()->setClassName(JsonView::class);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pot = $this->Pots->newEmptyEntity();

        $error = [];

        if ($this->request->is('post')) {
            $pot = $this->Pots->patchEntity($pot, ['value' => 'Lorem']);

            $pot->pastas = [
                $this->Pots->Pastas->newEntity([
                    'name' => 'Cacio e Pepe',
                    'model' => $this->Pots->getRegistryAlias(),
                ])
            ];

            $error = $pot->getErrors();

            if (!$this->Pots->save($pot)) {
                $error = $pot->getErrors();
            }
        }
        $this->set(compact('pot', 'error'));
        $this->viewBuilder()->setOption('serialize', ['pot', 'error']);
    }
}
