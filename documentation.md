# Introduction to Mekawei Cafe

Navigate our site using the top navigation bar. The homepage features the about section, a carousel slideshow showcasing the types of work areas at this business, and information about memberships.  

We have two menu pages where you can click on the images for information about that food or drink item.

Lastly, we have a reviews page for our patrons to leave a review of their experiences.

## jquery and Javascript

**1.** Bubble tea and dessert menu pages: The images on both menus have a flip card function. When you click on the menu item image, the image flips to show the price of the item. This was accomplished using jQuery's toggle function which would apply a CSS class that uses transform to flip the image.

**2.** Homepage: A slideshow was created using javascript to showcase the various rooms of our business. The arrows for controlling forwards/backwards are positioned over the image using CSS position property.

## Mobile Friendly

All the pages are designed using a mobile-first approach which we then adapted to suit a larger screen.

## Responsive Design

Mobile first design approach with a hamburger menu as default navigation bar. Used a breakpoint at 768px to expand the navigation bar. The menus also change layouts to reflect a mobile and a desktop optimized version. The layout for all pages mainly used CSS Grid.

## Animation

**1.** Transitions

- All pages: All links have a hover state that uses transition to slowly change the colour of the link.
- Homepage: The slideshow has transition on the arrows and slide indicators to make the hover over state look less jarring
- Both Menus: Menu pages use transition with transform to show details of the menu pictures when clicked.

**2.** Keyframe Animations

- Homepage: The landing page portion of the homepage feature slide in animation.
- Homepage: The slideshow slides fade in and slide to the right at the same time

## Validation

**1.** On the review page, users had to insert "@" in the email section and the email is required. This rule is enforced on front and back end.

**2.** On the review page, users had to insert more than 8 characters in the comment input. The comment section is required. This rule is enforced on front and back end.

**3.** Homepage: Register has front end validation for emails.

## Prevent Malicious Activity

**1.** In database/database.php lines 40-49, we used sql injection prevention method with pdo prepared statements.

## Add to database

**1.** Reviews page: Users can submit a review of their experience

## Fetch dynamic content

**1.** Reviews page: Reviews are fetched from the database and displayed on the webpage
