import { Box, List, ListItemButton, ListItemText } from '@mui/material';
import { AppRoute } from '../../const';

function PageNavigation() {
  return (
    <Box sx={{
      borderRight: '1px solid rgba(0, 0, 0, 0.12)',
      backgroundColor: 'white',
      minWidth: '220px'
    }}>
      <List component="nav">
        <ListItemButton href={AppRoute.Index}>
          <ListItemText primary="Вернуться на сайт" />
        </ListItemButton>

        <ListItemButton href={AppRoute.Quotes['index']}>
          <ListItemText primary="Мысли" />
        </ListItemButton>

        <ListItemButton href={AppRoute.Tags}>
          <ListItemText primary="Теги" />
        </ListItemButton>

        <ListItemButton href={AppRoute.Posts['index']}>
          <ListItemText primary="Картинки" />
        </ListItemButton>

        <ListItemButton href={AppRoute.Logout}>
          <ListItemText primary="Выйти" />
        </ListItemButton>
      </List>
    </Box>
  );
}

export default PageNavigation;
