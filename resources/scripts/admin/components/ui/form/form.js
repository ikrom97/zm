import { Box, Button, Grid, InputLabel, TextField } from '@mui/material';
import dayjs from 'dayjs';
import ImageField from './ImageField/ImageField';
import BodyField from './BodyField';

function Form({ onSubmit, data }) {
  const date = data?.date
    ? dayjs(data.date).format('YYYY-MM-DD HH:mm')
    : dayjs().format('YYYY-MM-DD HH:mm')

  return (
    <Box
      component="form"
      onSubmit={onSubmit}
      encType='multipart/form-data'
      sx={{
        display: 'flex',
        flexDirection: 'column',
        gap: 2,
        padding: "32px 24px",
        backgroundColor: 'white',
        borderRadius: 1,
        marginTop: 1,
      }}
    >
      <Grid container spacing={2}>
        <Grid item xs={4}>
          <ImageField image={data?.image?.src} />
        </Grid>

        <Grid item xs={8} />

        <Grid item xs={4}>
          <TextField
            name="date"
            label="Дата"
            defaultValue={date}
            type="datetime-local"
            fullWidth
            required
          />
        </Grid>

        <Grid item xs={8} />

        <Grid item xs={8}>
          <TextField
            name="title"
            label="Название"
            type="text"
            defaultValue={data?.title}
            fullWidth
            required
          />
        </Grid>
      </Grid>

      <Grid item xs={12}>
        <InputLabel>Контент</InputLabel>
        <BodyField body={data?.body} />
      </Grid>

      <Grid item xs={12} display="flex" justifyContent="flex-end">
        <Button variant="contained" type="submit">Сохранить</Button>
      </Grid>
    </Box>
  );
}

export default Form;
