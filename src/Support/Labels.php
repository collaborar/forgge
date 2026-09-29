<?php

declare( strict_types=1 );

namespace Forgge\Support;

class Labels
{
	/**
	 * Get labels for custom post type registration.
	 *
	 * @param string $singular
	 * @param string $plural
	 * @param bool $is_female
	 * @return array
	 */
	public static function post_type(string $singular, string $plural, bool $is_female = false): array
	{
		$singular_lower = strtolower( $singular );
		$plural_lower = strtolower( $plural );

		$labels = [
			'archives' => sprintf(
				/* translators: %s: plural label. */
				__('%s Archives', 'alloggio'),
				$plural
			),
			'attributes' => sprintf(
				self::gendered_label(
					/* translators: %s: singular label. */
					_x('%s Attributes', 'male content type', 'alloggio'),
					/* translators: %s: singular label. */
					_x('%s Attributes', 'female content type', 'alloggio'),
					$is_female
				),
				$singular
			),
			'insert_into_item' => sprintf(
				self::gendered_label(
					/* translators: %s: singular label. */
					_x('Insert into %s', 'male content type', 'alloggio'),
					/* translators: %s: singular label. */
					_x('Insert into %s', 'female content type', 'alloggio'),
					$is_female
				),
				$singular_lower
			),
			'uploaded_to_this_item' => sprintf(
				self::gendered_label(
					/* translators: %s: singular label. */
					_x('Uploaded to this %s', 'male content type', 'alloggio'),
					/* translators: %s: singular label. */
					_x('Uploaded to this %s', 'female content type', 'alloggio'),
					$is_female
				),
				$singular_lower
			),
			'filter_items_list' => sprintf(
				/* translators: %s: plural label. */
				__('Filter %s list', 'alloggio'),
				$plural_lower
			),
			'add_new' => sprintf(
				/* translators: %s: singular label. */
				__('Add %s', 'alloggio'),
				$singular
			),
			'new_item' => sprintf(
				self::gendered_label(
					/* translators: %s: singular label. */
					_x('New %s', 'male content type', 'alloggio'),
					/* translators: %s: singular label. */
					_x('New %s', 'female content type', 'alloggio'),
					$is_female
				),
				$singular
			),
			'view_items' => sprintf(
				/* translators: %s: plural label. */
				__('View %s', 'alloggio'),
				$plural
			),
			'not_found_in_trash' => sprintf(
				self::gendered_label(
					/* translators: %s: plural label. */
					_x('No %s found in Trash.', 'male content type', 'alloggio'),
					/* translators: %s: plural label. */
					_x('No %s found in Trash.', 'female content type', 'alloggio'),
					$is_female
				),
				$plural_lower
			),
			'item_published' => sprintf(
				self::gendered_label(
					/* translators: %s: singular label. */
					_x('%s published.', 'male content type', 'alloggio'),
					/* translators: %s: singular label. */
					_x('%s published.', 'female content type', 'alloggio'),
					$is_female
				),
				$singular
			),
			'item_published_privately' => sprintf(
				self::gendered_label(
					/* translators: %s: singular label. */
					_x('%s published privately.', 'male content type', 'alloggio'),
					/* translators: %s: singular label. */
					_x('%s published privately.', 'female content type', 'alloggio'),
					$is_female
				),
				$singular
			),
			'item_reverted_to_draft' => sprintf(
				self::gendered_label(
					/* translators: %s: singular label. */
					_x('%s reverted to draft.', 'male content type', 'alloggio'),
					/* translators: %s: singular label. */
					_x('%s reverted to draft.', 'female content type', 'alloggio'),
					$is_female
				),
				$singular
			),
			'item_trashed' => sprintf(
				self::gendered_label(
					/* translators: %s: singular label. */
					_x('%s trashed.', 'male content type', 'alloggio'),
					/* translators: %s: singular label. */
					_x('%s trashed.', 'female content type', 'alloggio'),
					$is_female
				),
				$singular
			),
			'item_scheduled' => sprintf(
				self::gendered_label(
					/* translators: %s: singular label. */
					_x('%s scheduled.', 'male content type', 'alloggio'),
					/* translators: %s: singular label. */
					_x('%s scheduled.', 'female content type', 'alloggio'),
					$is_female
				),
				$singular
			),
			'item_updated' => sprintf(
				self::gendered_label(
					/* translators: %s: singular label. */
					_x('%s updated.', 'male content type', 'alloggio'),
					/* translators: %s: singular label. */
					_x('%s updated.', 'female content type', 'alloggio'),
					$is_female
				),
				$singular
			),
		];

		return array_merge(
			$labels,
			self::common_labels( $singular, $plural, $is_female ),
		);
	}

	/**
	 * Choose the male or female translation of a label template.
	 *
	 * @param string $male
	 * @param string $female
	 * @param bool $is_female
	 * @return string
	 */
	protected static function gendered_label( string $male, string $female, bool $is_female ): string {
		return $is_female ? $female : $male;
	}

	/**
	 * Get common labels shared between post type and taxonomy.
	 *
	 * @param string $singular
	 * @param string $plural
	 * @param bool $is_female
	 * @return void
	 */
	protected static function common_labels( string $singular, string $plural, bool $is_female ): array {
		$singular_lower = strtolower( $singular );
		$plural_lower = strtolower( $plural );

		return [
			'name' => $plural,
			'singular_name' => $singular,
			'menu_name' => $plural,
			'name_admin_bar' => $singular,

			/**
			 * Navigation.
			 */
			'search_items' => sprintf(
				/* translators: %s: plural label. */
				__('Search %s', 'alloggio'),
				$plural_lower
			),
			'all_items' => sprintf(
				self::gendered_label(
					/* translators: %s: plural label. */
					_x('All %s', 'male content type', 'alloggio'),
					/* translators: %s: plural label. */
					_x('All %s', 'female content type', 'alloggio'),
					$is_female
				),
				$plural
			),
			'parent_item_colon' => sprintf(
				self::gendered_label(
					/* translators: %s: singular label. */
					_x('Parent %s:', 'male content type', 'alloggio'),
					/* translators: %s: singular label. */
					_x('Parent %s:', 'female content type', 'alloggio'),
					$is_female
				),
				$singular
			),
			'edit_item' => sprintf(
				/* translators: %s: singular label. */
				__('Edit %s', 'alloggio'),
				$singular
			),
			'view_item' => sprintf(
				/* translators: %s: singular label. */
				__('View %s', 'alloggio'),
				$singular
			),
			'add_new_item' => sprintf(
				self::gendered_label(
					/* translators: %s: singular label. */
					_x('Add %s', 'male content type', 'alloggio'),
					/* translators: %s: singular label. */
					_x('Add %s', 'female content type', 'alloggio'),
					$is_female
				),
				$singular
			),
			'not_found' => sprintf(
				self::gendered_label(
					/* translators: %s: plural label. */
					_x('No %s found.', 'male content type', 'alloggio'),
					/* translators: %s: plural label. */
					_x('No %s found.', 'female content type', 'alloggio'),
					$is_female
				),
				$plural_lower
			),

			/**
			 * Links.
			 */
			'items_list' => sprintf(
				/* translators: %s: plural label. */
				__('%s list', 'alloggio'),
				$plural
			),
			'items_list_navigation' => sprintf(
				/* translators: %s: plural label. */
				__('%s list navigation', 'alloggio'),
				$plural
			),
			'item_link' => sprintf(
				/* translators: %s: singular label. */
				__('%s Link', 'alloggio'),
				$singular
			),
			'item_link_description' => sprintf(
				self::gendered_label(
					/* translators: %s: singular label. */
					_x('A link to a %s', 'male content type', 'alloggio'),
					/* translators: %s: singular label. */
					_x('A link to a %s', 'female content type', 'alloggio'),
					$is_female
				),
				$singular_lower
			),
		];
	}
}
