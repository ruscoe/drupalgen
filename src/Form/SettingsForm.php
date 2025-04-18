<?php

namespace Drupal\drupalgen\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

class SettingsForm extends ConfigFormBase {

  const DEFAULT_COMPLETION_TOKENS = 512;
  const DEFAULT_MODEL = 'gpt-4o';

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return ['drupalgen.settings'];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'drupalgen_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('drupalgen.settings');

    // Add a text field for the OpenAI API key.
    $form['openai_api_key'] = [
      '#type' => 'textfield',
      '#title' => $this->t('OpenAI API Key'),
      '#default_value' => $config->get('openai_api_key'),
      '#description' => $this->t('Enter your OpenAI API key.'),
    ];

    // Add a text field for the max completion tokens.
    $form['max_completion_tokens'] = [
      '#type' => 'number',
      '#title' => $this->t('Max Completion Tokens'),
      '#default_value' => $config->get('max_completion_tokens') ? $config->get('max_completion_tokens') : self::DEFAULT_COMPLETION_TOKENS,
      '#description' => $this->t('Enter the maximum number of tokens to use per API response.'),
    ];

    // Add a select field for the model.
    $form['model'] = [
      '#type' => 'select',
      '#title' => $this->t('Model'),
      '#options' => [
        'gpt-4o' => $this->t('GPT-4 OpenAI'),
        'gpt-3.5-turbo' => $this->t('GPT-3.5 Turbo'),
      ],
      '#default_value' => $config->get('model') ? $config->get('model') : self::DEFAULT_MODEL,
      '#description' => $this->t('Select the ChatGPT model to use.'),
    ];

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $this->config('drupalgen.settings')
      ->set('openai_api_key', $form_state->getValue('openai_api_key'))
      ->set('max_completion_tokens', $form_state->getValue('max_completion_tokens'))
      ->set('model', $form_state->getValue('model'))
      ->save();

    parent::submitForm($form, $form_state);
  }
}
