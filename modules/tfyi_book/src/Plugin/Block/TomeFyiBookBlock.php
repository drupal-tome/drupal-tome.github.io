<?php

namespace Drupal\tfyi_book\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\book\BookManagerInterface;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Provides a 'Expanded book navigation' block.
 *
 * @Block(
 *   id = "expanded_book_navigation",
 *   admin_label = @Translation("Expanded book navigation"),
 *   category = @Translation("Menus")
 * )
 */
class TomeFyiBookBlock extends BlockBase implements ContainerFactoryPluginInterface {

  /**
   * The book manager.
   *
   * @var \Drupal\book\BookManagerInterface
   */
  protected $bookManager;

  /**
   * Constructs a new BookNavigationBlock instance.
   *
   * @param array $configuration
   *   A configuration array containing information about the plugin instance.
   * @param string $plugin_id
   *   The plugin_id for the plugin instance.
   * @param mixed $plugin_definition
   *   The plugin implementation definition.
   * @param \Drupal\book\BookManagerInterface $book_manager
   *   The book manager.
   */
  public function __construct(array $configuration, $plugin_id, $plugin_definition, BookManagerInterface $book_manager) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);

    $this->bookManager = $book_manager;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('book.manager')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function build() {
    $book_menus = [];
    foreach ($this->bookManager->getAllBooks() as $book_id => $book) {
      $data = $this->bookManager->bookTreeAllData($book_id);
      $book_menus[$book_id] = $this->bookManager->bookTreeOutput($data);
      $book_menus[$book_id] += [
        '#book_title' => $book['title'],
      ];
    }
    if ($book_menus) {
      return [
          '#theme' => 'book_all_books_block',
        ] + $book_menus;
    }
    return [];
  }

  /**
   * {@inheritdoc}
   */
  public function getCacheMaxAge() {
    return 0;
  }

}
